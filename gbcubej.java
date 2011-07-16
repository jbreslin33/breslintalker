import java.awt.*;

public class gbcubej extends java.applet.Applet {

    double Theta = 0.005;
    double L = 50;
    double POV = 500;
    double Offset = 100;
    Polygon T = new Polygon();
    int iLoop = 0;
    int Delay = 15;

    double[] Px  = {-L, -L,  L,  L, -L, -L, L,  L};     //real x-coordinate, 8 points
    double[] Py  = {-L,  L,  L, -L, -L,  L, L, -L};     //real y-coordinate, 8 points
    double[] Pz  = {-L, -L, -L, -L,  L,  L, L,  L};     //real z-coordinate, 8 points
    double[] PPx = {-L, -L,  L,  L, -L, -L, L,  L};     //projected x-coordinate, 8 points
    double[] PPy = {-L,  L,  L, -L, -L,  L, L, -L};     //projected y-coordinate, 8 points

    int    V1temp, V2temp, V3temp;                      //temp variables used in sorting
    double V4temp, V5temp;                              //temp variables used in sorting
    double oldX, oldY, oldZ;                            //temp variables used in rotating

    int[] V1 = {0, 0, 4, 4, 7, 7, 3, 3, 2, 2, 3, 3,};   //vertex1
    int[] V2 = {3, 2, 0, 1, 4, 5, 7, 6, 6, 5, 0, 4,};   //vertex2
    int[] V3 = {2, 1, 1, 5, 5, 6, 6, 2, 5, 1, 4, 7,};   //vertex3
    double[] V4 = new double[12];                       //Average Z of all 3 vertices 
    double[] V5 = new double[12];                       //DotProduct of Normal and POV

    double CPX1, CPX2, CPX3, CPY1, CPY2, CPY3;          //temp variables used in Cross Product
    double CPZ1, CPZ2, CPZ3, DPX, DPY, DPZ;             //temp variables used in Cross/Dot Product

    boolean Continue = true;                            //controls whether painting continues

    public void init() { setBackground(Color.green); }

    public void start() { Continue = true; }

    public void stop() { Continue = false; }

    public void SortByDepth(Graphics screen) {
       for (int w = 0; w < 12 ; w++) {
          V4[w] = (Pz[V1[w]]+Pz[V2[w]]+Pz[V3[w]]) / 3;
       }
       for (int g = 0; g < 11 ; g++) {
          for (int h = 0; h < 12; h++) {
             if (V4[g] < V4[h]) {
                V1temp = V1[g]; V2temp = V2[g]; V3temp = V3[g]; V4temp = V4[g]; V5temp = V5[g];
                V1[g]=V1[h];    V2[g]=V2[h];    V3[g]=V3[h];    V4[g]=V4[h];    V5[g]=V5[h];
                V1[h]=V1temp;   V2[h]=V2temp;   V3[h]=V3temp;   V4[h]=V4temp;   V5[h]=V5temp;
             }
          }
       }
    }

    public void BackFaceCulling(Graphics screen) {
       for (int w = 0; w < 12 ; w++) {        
          // Cross Product
          CPX1 = Px[V2[w]] - Px[V1[w]];
          CPY1 = Py[V2[w]] - Py[V1[w]];
          CPZ1 = Pz[V2[w]] - Pz[V1[w]];
          CPX2 = Px[V3[w]] - Px[V1[w]];
          CPY2 = Py[V3[w]] - Py[V1[w]];
          CPZ2 = Pz[V3[w]] - Pz[V1[w]];
          DPX = CPY1 * CPZ2 - CPY2 * CPZ1;
          DPY = CPX2 * CPZ1 - CPX1 * CPZ2;
          DPZ = CPX1 * CPY2 - CPX2 * CPY1;
          // DotProduct uses POV vector 0,0,POV  as x1,y1,z1
          V5[w] = 0 * DPX + 0 * DPY + POV * DPZ;
       }
    }

    public void ApplyProjection(Graphics screen) {
       for (int w = 0; w < 8 ; w++) {
          PPx[w] = Px[w];
          PPy[w] = Py[w];
       }
    }

    public void DrawCube(Graphics screen) {
       screen.clearRect(0,0,getSize().width, getSize().height);
       for (int w = 0; w < 12 ; w++) {
          screen.setColor(Color.red);   
          if (V5[w] > 0) {              
             T.addPoint ((int)(PPx[V1[w]]+Offset), (int)(PPy[V1[w]]+Offset));
             T.addPoint ((int)(PPx[V2[w]]+Offset), (int)(PPy[V2[w]]+Offset));
             T.addPoint ((int)(PPx[V3[w]]+Offset), (int)(PPy[V3[w]]+Offset));
             screen.fillPolygon(T);
             screen.setColor(Color.blue);   
             screen.drawPolygon(T);        
             T.reset();
          }
       }
    }

    public void RotatePoints(Graphics screen) {
       for (int w=0; w < 8; w++) {
          oldY = Py[w]; oldZ = Pz[w];
          Py[w] = oldY * Math.cos(Theta) - oldZ * Math.sin(Theta);  //rotate about X
          Pz[w] = oldY * Math.sin(Theta) + oldZ * Math.cos(Theta);  //rotate about X

          oldX = Px[w]; oldZ = Pz[w];
          Px[w] = oldZ * Math.sin(Theta) + oldX * Math.cos(Theta);  //rotate about Y
          Pz[w] = oldZ * Math.cos(Theta) - oldX * Math.sin(Theta);  //rotate about Y

          oldX = Px[w]; oldY = Py[w];
          Px[w] = oldX * Math.cos(Theta) - oldY * Math.sin(Theta);  //rotate about Z
          Py[w] = oldX * Math.sin(Theta) + oldY * Math.cos(Theta);  //rotate about Z
       }
    }

    public void paint(Graphics screen) {
      if (Continue) {
        SortByDepth(screen);
        BackFaceCulling(screen);
        ApplyProjection(screen);
        DrawCube(screen);
        try { Thread.sleep(Delay); } catch (InterruptedException e) {}   //delay
        RotatePoints(screen);
        repaint();
       }
    }
}