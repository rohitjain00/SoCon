#include <stdio.h>
#include <malloc.h>
#include <stdbool.h>
#include <unistd.h>
#include <stdlib.h>
#include <string.h>
#include <windows.h>
#include <conio.h>
#include<time.h>
//make an add friend
//test the whole program
#define PROGRESS_BAR_SIZE 40

COORD coord={0,0};

//int k=0;


typedef struct user
{
    char fName[20];
    char lName[20];
    char username[40];
    char password[20];
    int age;
    char status[100];
    char gender[2];//m for male and f for female
}user;
///////////////////////////////////////////////////////////////////////////////////////////

struct node
{
    user *data;
    struct node *next;
};

void dimension(int x,int y)
{
    COORD coord;
    coord.X=x;
    coord.Y=y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}


struct node *head;

void insertNewNode(user *newUser)
{
    struct node *temp;
    temp=head;
    struct node *a=(struct node *)malloc(sizeof(struct node));
    a->data=newUser;
    if (head==NULL)
    {
        head=a;
        head->next=NULL;
    }
    else
    {
        while (temp->next!=NULL)
        {
            temp=temp->next;
        }
        temp->next=a;
        a->next=NULL;
    }
}


void deleteUser(char userName[40])
{
    if (strcmp(userName,"admin") == 0) {
        printf("cannot be deleted");
        char c[2];scanf("%s",c);
        return;
    }
    struct node *temp, *temp1 = head;
    temp=head;
    if (head==NULL)
    {
        printf("\nNO USER FOUND");
    }
    else
    {
        while(strcmp(temp->data->username,userName) != 0)
        {
            printf("Ghus gya");
            temp1=temp;
            temp=temp->next;
        }
        if (temp->next==NULL)
        {
            temp1->next=NULL;
            free(temp);
        }
        else
        {
            temp1->next=temp->next;
            free(temp);
        }
        printf("THE USER ACCOUNT WAS DELETED");
    }
    if (head == NULL) {
        head = NULL;
    }

}


user * searchUser(char userName[40])
{
    struct node *temp;
    temp=head;
    if (head==NULL)
    {
        printf("\nNO USER FOUND");
        return NULL;
    }
    else
    {
        while(strcmp(temp->data->username,userName) != 0)
        {
            temp=temp->next;
            if (temp==NULL)
            {
                printf("\nNO USER FOUND");
                break;
            }
        }
        return (user *) temp->data;
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////
user *currUser;
bool loggedin;
typedef struct
{
    char senderUsername[40];
    char message[200];
    char recieverUsername[40];
}message;
//messages would be stored in a messages.txt file
// all accounts would be stored in accounts.txt file
void addDataTolist();
int numberOfUsers();
void loginUser();
void registerUser();
void showListOfUsers();
void sendMessages();
void recieveMessage();
void changeStatus();
void editCurrentUser();
void deleteCurrentUser();
void addListToData();
void logout();
void loading();
void soconlogo();

int main()
{
    system("color F4");

    addDataTolist();

    int n,p,m;


do
{
        soconlogo();
        user *users = currUser;

        dimension(80,13);
        printf(" 1. Login\n");
        if (loggedin) {
            dimension(100,15);
            printf("Logged in as %s\n", currUser->username);
        } else {
            dimension(90,16);
            printf("Please Login/Register to use the app!!\n");
        }
        dimension(100,13);
        printf("2. Register\n") ;
        dimension(140,13);
        printf("0. Search");
        dimension(100,19);
        printf("3. Show Users\n") ;
        dimension(100,20);
        printf("4. Send message\n") ;
        dimension(100,21);
        printf("5. View Previous Messages\n") ;
        dimension(100,22);
        printf("6. change Status\n") ;
        dimension(100,23);
        printf("7. edit your account\n") ;
        dimension(100,24);
        printf("8. Delete my account\n") ;
        dimension(120,13);
        printf("9. Logout\n") ;
        dimension(100,25);
        printf("10. Exit\n") ;
        dimension(100,26);
        printf(" Enter Your Choice\t") ;
        scanf("%d",&n);
        if(n!=5)
        {load();}
        switch (n)
        {
            case 0:
                searchSpecificUser();
                break;
            case 1:
                loginUser();
                break;
            case 2:
                registerUser();
                break;
            case 3:
                showListOfUsers();
                break;
            case 4:
                sendMessages();
                break;
            case 5:
                recieveMessage();
                break;
            case 6:
                changeStatus();
                break;
            case 7:
                editCurrentUser();
                break;
            case 8:
                deleteCurrentUser();
                break;
            case 9:
                logout();
                break;
            default:
                break;
        }
        system("cls");
    }
     while(n != 10);

    addListToData();
}

void addDataTolist()
{
    FILE *fptr = fopen("accounts.txt","r+");

    if (fptr == NULL)
        {
            printf("File handling error");
            return;
        }

    while (!feof(fptr))
        {
            user *users = (user *) malloc(sizeof(user));
            fscanf(fptr,"%s %s %s %s %d %s %s\n",users->fName,users->lName,users->username,users->password,&users->age,users->status,users->gender);
            insertNewNode(users);
        }
}

void addListToData()
{
    FILE *fptr = fopen("accounts.txt","w+");
    if (fptr == NULL) {
        printf("File handling error");
        return;
    }
    user *users;
    while (head != NULL) {
        users = head->data;
        fprintf(fptr,"%s %s %s %s %d %s %s\n",users->fName,users->lName,users->username,users->password,users->age,users->status,users->gender);
        head = head->next;
    }
    fclose(fptr);
    return;
}

void loginUser()
{
    if (loggedin) {return;}

    system("cls");
    soconlogo();
    char username [40];
    char password[20];
    dimension(100,21);
    printf("Username : ");scanf("%s",username);
    dimension(100,23);

    printf("Password : ");scanf("%s",password);
    load();
    system("cls");
    soconlogo();

user *user = searchUser(username);
    dimension(89,15);
    if (user == NULL)
    {

        printf("/n/n User Not Founnd!!...");
        return;
    }
    if (strcmp(password,user->password) == 0)

        {


        if (user->gender[0]=='m'||user->gender[0]=='M')
        {
            printf("Mr.\t");
        }
        else
        {

            printf("Ms. ");
        }

        printf("%s welcome to the SoCon....",user->fName);
        dimension(90,17);
        printf("Have a nice experience....");
        dimension(90,18);
        printf("Press any key to continue");
        char c[2];
        scanf("%s",c);

        loggedin = true;
        currUser = user;
        }
    else
        {
        printf("\nENTERED PASSWORD IS WRONG!!!");
        int i;
        scanf("%d",&i);
        for (i = 0; i < 10000000; i++) {
            printf("");
        }
        return;
    }
}
void registerUser()
{
    if (loggedin) {return;}
    system("cls");
    soconlogo();
    user *tempUser = (user *)malloc(sizeof(user));
    dimension(90,11);
    printf("SoCon:Social Connection\n");
    dimension(100,12);
    printf("SIGN UP\n");
    dimension(80,13);
    printf("Enter the following details to get yourself registered\n");
    dimension(100,14);
    printf("First Name :");scanf("%s",tempUser->fName);
    dimension(100,15);
    printf("Last Name  : ");scanf("%s",tempUser->lName);
    dimension(100,16);
    printf("Username   : ");scanf("%s",tempUser->username);
    dimension(100,17);
    printf("Password   : ");scanf("%s",tempUser->password);
    dimension(100,18);
    printf("Age        : ");scanf("%d",&tempUser->age);
    dimension(100,19);
    printf("Status     : ");scanf("%s",&tempUser->status);
    dimension(100,20);
    printf("Gender     : ");scanf("%s",&tempUser->gender);
    system("cls");
    load();

    currUser = tempUser;    loggedin = true;
    insertNewNode(tempUser);
}

void showListOfUsers()
{
    system("cls");
    soconlogo();

    struct node *temp;
    temp=head;
    if (head==NULL)
    {
        printf("\nNO USER FOUND");
        return;
    }
    else
    {
        dimension(80,14);
        printf("------------------SoCon FAMILY-------------------\n");
        while(temp!=NULL)
        {
            printf("\n\t\t\t\t\t\t\t\t\t\t\t\t    %s",temp->data->username);
            printf("\n\t\t\t\t\t\t\t\t\t\t\t\t%s\t%s\n\n",temp->data->fName,temp->data->lName);
            temp = temp->next;
        }
    }
    char c[50];
    scanf("\n%s",c);
}

void sendMessages()
{
    if (!loggedin) {return;}
    system("cls");
    soconlogo();
    message *newMessage = (message *)malloc(sizeof(message));
    strcpy(newMessage->senderUsername,currUser->username);
    char recieverUsername [40];
    dimension(90,15);
    printf("To : ");
    scanf("%s",recieverUsername);
    strcpy(newMessage->recieverUsername,recieverUsername);
    if (searchUser(recieverUsername) == NULL){
        printf("\n\nNo user with such username present....\n\n");
        return;
    }
    else {
            dimension(80,16);
        printf("Enter the message to send : ");scanf("%s",newMessage->message);
        sendmsgload();
        FILE *fptr = fopen("messages.txt","a+");
        if (fptr == NULL) {
            printf("Message file handling error!!");
            return;
        }
        fprintf(fptr,"%s %s %s\n",newMessage->recieverUsername,newMessage->message, newMessage->senderUsername);
        fclose(fptr);
    }
    return;
}

void recieveMessage()
{
    if (!loggedin) {return;}
    system("cls");
    soconlogo();
    rmsgload();
    system("cls");
    soconlogo();
    FILE *fptr = fopen("messages.txt","r");
    if (fptr == NULL) {
        printf("File handling error");
        return;
    }
    message *message1 = (message *) malloc(sizeof(message));
    dimension(0,15);
    printf("Messages\t\t\tSender\n");
    while (!feof(fptr)) {
        fscanf(fptr,"%s %s %s\n",message1->recieverUsername,message1->message, message1->senderUsername);
        if (strcmp(message1->recieverUsername,currUser->username)==0){
            printf("%s\t\t\t\t%s\n",message1->message,(*message1).senderUsername);
        }
    }
    fclose(fptr);
    char c[2];
    dimension(90,19);
    printf("Enter any key to continue:\n");
    scanf("%s",c);
}

void changeStatus()
{
    if (!loggedin) {return;}
    system("cls");
    soconlogo();
    dimension(80,15);
    printf("Current Status : %s\n\n",currUser->status);
        dimension(80,17);
        printf("Enter new status : ");
        char newStatus[200];
        scanf("%s",newStatus);
        strcpy(currUser->status,newStatus);

}

void editCurrentUser()
{
    if (!loggedin) {return;}
    system("cls");
    soconlogo();
    dimension(80,15);
    printf("You can change all U want: press 1 to change or press some other key to continue..\n");
    user *updatedUser=currUser;
    int wantToUpdate;
    dimension(80,17);
    printf("Do you want to change username??\n");
    scanf("%d",&wantToUpdate);
    if (wantToUpdate == 1)
    {
        dimension(80,19);
        printf("Your old username was %s\n",currUser->username);
        char newUsername[40];
        dimension(80,21);
        printf("Enter new UserName:\t");
        scanf("%s",newUsername);
        strcpy(updatedUser->username,newUsername);
        dimension(80,23);
        dimension(80,24);
        printf("UserName Update Successful.");
        printf( "Your updated username is\t%s\n",updatedUser->username);
        char h[2];
        scanf("%s",h);
    }
    system("cls");
    soconlogo();
    dimension(80,15);
    printf("Do you want to change password??");
    scanf("%d",&wantToUpdate);
    if (wantToUpdate == 1){
            dimension(80,17);
        printf("Your old password was \t%s\n",currUser->password);
        char password[40];
        char npassword[40];
    dimension(80,19);
        printf("Enter new password:\t");
        scanf("%s",password);
        dimension(80,21);
        printf("Confirm new password:\t ") ;
        scanf("%s",npassword);
        if (strcmp(password,npassword)==0)
        {
            strcpy(updatedUser->password,password);
            dimension(80,23);
            printf("Your password has been updated.\n");
            char h[2];
        scanf("%s",h);

        }
        else
        {
            printf("Password update FAILED!!!!");
            char h[2];
        scanf("%s",h);
        }
       // strcpy(updatedUser->password,password);
       // printf("Your new password has been updated to %s:\n",updatedUser->password);
    }
     system("cls");
    soconlogo();
    dimension(80,15);
    printf("Do you want to change age??");
    scanf("%d",&wantToUpdate);
    int newAge;
    if (wantToUpdate == 1)
    {
        dimension(80,17);
        printf("Your old age was %d\n",currUser->age);
        dimension(80,19);
        printf("Enter updated age:\t");
        scanf("%d",&newAge);
        updatedUser->age = newAge;
        dimension(80,21);
        printf("Your updated age is:\t%d\n",updatedUser->age);
        dimension(80,23);
        printf("Press any key to Continue");
        char l[2];
        scanf("%s",l);

    }
    load();
    currUser = updatedUser;
}

void deleteCurrentUser()
{
    if (!loggedin) {return;}
    deleteUser(currUser->username);
    loggedin = false;
    currUser = NULL;
}

void logout()
{
    loggedin = false;
    currUser = NULL;

}

void print_n_chars(int n, int c)
{
    while (n-- > 0) putchar(c);
}

void delay(unsigned int mseconds)
{
    clock_t goal = mseconds + clock();
    while(goal>clock());
}

void load()
{
    dimension(100,40);
    printf("LOADING");
    int i;
    dimension(80,42);
    for(i=0;i<50;i++)
    {
        delay(15);

        printf("\xDB");
    }

}

void sendmsgload()
{
    dimension(100,40);
    printf("SENDING MESSAGE");
    int i;
    dimension(80,42);
    for(i=0;i<50;i++)
    {
        delay(30);

        printf("\xDB");
    }

}

void rmsgload()
{
    dimension(100,14);
    printf("CHECKING FOR NEW MESSAGES");
    int i;
    dimension(80,17);
    for(i=0;i<50;i++)
    {
        delay(40);

        printf("\xDB");
    }

}

void soconlogo()
{
     int i,j;
    for(i=0;i<4;i++)
    {
        for(j=0;j<105;j++)
            printf("\xB0\xDB");
        printf("\n");
    }
    for(i=0;i<210;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xDB\xB2\xDB\xB2\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xDB\xB2\xDB\xB2\xB0\xB0\xDB\xB2\xB0\xB0\xB0\xB0\xB0\xB0\xDB\xB2\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\n");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    printf("\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0\xB0");
    for(i=0;i<82;i++)
    {
        printf("\xB0");
    }
    dimension(0,30);
     for(i=0;i<4;i++)
    {
        for(j=0;j<210;j++)
            printf("\xB0");
        printf("\n");
    }
}

void searchSpecificUser()
{
    system("cls");
    soconlogo();
    char userName[40];
    scanf("%s",userName) ;

    struct node *temp;
    temp=head;

    int l,i=0,c=0;
    l=strlen(userName);
    printf("%d",l);

    if (head==NULL)
    {
        printf("\nNO USER FOUND");
        return NULL;
    }
    else
    {
        dimension(80,14);
        printf("------------------SEARCH RESULTS-------------------\n");
        bool hasMatched = false;
        while(temp!=NULL)
        {
            while(userName[i]!='\0')
            {
                if(temp->data->fName[i]==userName[i]){
                        hasMatched = true;
                } else {
                    hasMatched = false;
                }

                i++;

            }
            if(hasMatched)
            {
                    printf("\n\t\t\t\t\t\t\t\t\t\t\t\t    %s",temp->data->username);
                    printf("\n\t\t\t\t\t\t\t\t\t\t\t\t%s\t%s\n\n",temp->data->fName,temp->data->lName);
            }
            temp=temp->next;
            i=0;
        }
            printf("\nEND OF RESULT");

             char c[50];
            scanf("\n%s",c);

    }
}
