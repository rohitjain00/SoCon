#include <stdio.h>
#include <string.h>
#include <malloc.h>

int numberOfUserAccounts;
bool logedin = false;

typedef struct user{
    char fName[20];
    char lName[20];
    char username[20];
    char password[100];
    char email[20];
    int DOB[3];//[day,month,year]
    char gender;// F/M
    char address[200];
    int numberOfFriends;
    char education[200];
    struct user *next;
    struct user *previous;
}user;

void login () {
    char username[40]; char password[60];
    scanf("%s", &username);
    scanf("%s", &password);
    FILE *accounts = fopen("accounts.txt","r");
    if (accounts == NULL) {printf("Unable to access accounts.txt file")return false;}
    else {
        char inFileUsername[40];
        char inFilePassword[60];
        user *user = (user) malloc(sizeof(user));
        while (fgetc(accounts) != EOF) {
            fread(user, sizeof(user),1,accounts)
            if(strcmp(user->username,inFileUsername) && strcmp(user->password, inFilePassword)) {
                fclose(accounts);
                free(user);
                logedin = true;
            }
        }
    }
    printf("\n\n Sorry no user found!! \n\n");
    free(user);
    fclose(accounts);
}
void register () {

user user = (user)malloc(sizeof(user));

printf("First Name : ");
scanf("%s", &user->fName);

printf("\n Last Name : ");
scanf("%s", &user->lName);

printf("\nusername : ");
scanf("%s", &user->username);

printf("\n password : ");
scanf("%s", &user->password);

printf("\n email : ");
scanf("%s", &user->email);

printf("\n DOB(dd-mm-yyyy) : ");
scanf("%d-%d-%d", &user->DOB[0], &user->DOB[1], &user->DOB[2]);

printf("\n genders : ");
scanf("%s", &user->gender);

printf("\n address : ");
scanf("%s", &user->address);

printf("\n education : ");
scanf("%s", &user->education);


user *pointerToUser = user;
FILE *accounts = fopen("accounts.txt","a+");
fwrite(pointerToUser, sizeof(user),1,accounts);
fclose(accounts);

}

void MainScreen() {
    printf("1. Login\n");
    printf("2. Register\n");
    printf("3. Exit\n");
}

void afterLoginScreen() {
    printf("1. Message\n");
    printf("2. My Info\n");
    printf("3. Message\n");
    printf("4. Find Friends\n");
    printf("5. Notifications\n");
    printf("6. Friends\n");
    printf("7. Logout\n");
}

int main (void) {
    int n = 0;
    //////////////////////////////////////////Main screen
    do {
        MainScreen();
        scanf("%d", &n);

        switch (n) {
            case 1: //asks for login details and returns weather true or false
                logedin = login();
                break;
            case 2:
                register();
                break;
            case 3:
                return;
            default:
                printf("Unsupported argument\n"); // code to be executed if n doesn't match any cases
        }
    } while(!logedin);
    //////////////////////////////////////////after User Login
    if (logedin) {
        int a = 0;
        while(a != 7) {

            afterLoginScreen();
            scanf("&d", &a);

            switch (a) {
                case 1:
                    message();
                    break;
                case 2:
                    register();
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;

                default:
                    printf("Unsupported argument\n"); // code to be executed if n doesn't match any cases
            }
        }
    }
}