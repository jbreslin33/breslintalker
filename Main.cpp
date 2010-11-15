#include "Talker.h"

int main(int argc, char *argv[])
{
    Talker* talker = new Talker();
    talker->setServerIP(argv[1]);
    talker->sendMessageToServer(argv[2]);
}
