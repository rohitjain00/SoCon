#include <stdio.h>
#include <malloc.h>
#include <stdbool.h>
#include <unistd.h>
#include<stdlib.h>
#include <string.h>
#pragma clang diagnostic push
#pragma ide diagnostic ignored "CannotResolve"
//make an add friend
//test the whole program

void clrscr()
{
  const char *CLEAR_SCREEN_ANSI = "\e[1;1H\e[2J";
  write(STDOUT_FILENO, CLEAR_SCREEN_ANSI, 12);
}


typedef struct user {
    char fName[20];
    char lName[20];
    char username[40];
    char password[20];
    int age;
    char status[100];
    char gender;//m for male and f for female
}user;
///////////////////////////////////////////////////////////////////////////////////////////
struct node {
    user *data;
    struct node *next;
};

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
    struct node *temp, *temp1 = NULL;
    temp=head;

    if (head==NULL)
    {
        printf("\nNO USER FOUND");
    }

    else
    {
        while(strcmp(temp->data->username,userName) != 0)
        {
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
            temp->next=NULL;
            free(temp);
        }

        printf("\nTHE USER ACCOUNT WAS DELETED");
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


        return (user *) temp;
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////
user *currUser;
bool loggedin;


typedef struct {
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
void addFriend();

int main() {
    int n;
    do {
        clrscr();
        printf("1. Login\n");
        if (loggedin) {
            printf("\n\t\t\t\t Logged in as %s\n", currUser->username);
        } else {
            printf("\n\t\t\t\t Please Login/Register to use the app!!\n");
        }
        printf(" \n 2. Register \n 3. Search User \n 4. Send message \n 5. View Previous Messages \n 6. change Status \n 7. edit your account \n 8.Delete my account \n 9.Add Friend 10.\nx`");
         scanf("%d",&n);
        switch (n)
        {
            case 1:
                loginUser();
                break;
            case 2:
                registerUser();
                break;
            case 3:
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
                addFriend();
                break;
        }
    }while(n != 9);


}


void addDataTolist() {
    FILE *fptr = fopen("accounts.txt","r");
    while(!feof(fptr) ){
        user *users = (user *) malloc(sizeof(user));
        fread(users,sizeof(user),1,fptr);
        insertNewNode(users);
        if (users == NULL) {
            break;
        }
    }
}

void loginUser() {
    clrscr();
    char username [40];
    char password[20];
    printf("Username : ");scanf("%s",username);
    printf("Password : ");scanf("%s",password);
    user *user = searchUser(username);
    if (user == NULL) {
        printf("/n/n User Not Founnd!!...");
        return;
    }
    if (strcmp(password,user->password) != 0) {
        if (user->gender == (char) "m" || user->gender == (char) "M") {
            printf("Mr.");
        } else {
            printf("Ms. ");
        }
        printf("%s",user->fName);
        printf("\nWelcome to the SoCon\n Have a nice experience....");
        loggedin = true;
        currUser = user;
    } else {
        printf("\nWrong Password hai yaar");
        return;
    }
}

void registerUser(){
    clrscr();
    user *tempUser = (user *)malloc(sizeof(user));
    printf("Enter the following details to get yourself registered\n");
    printf("First Name : ");scanf("%s",tempUser->fName);
    printf("\n Last Name : ");scanf("%s",tempUser->lName);
    printf("\nUsername : ");scanf("%s",tempUser->username);
    printf("\nPassword : ");scanf("%s",tempUser->password);
    printf("\nAge : ");scanf("%d",&tempUser->age);
    printf("\nStatus : ");scanf("%s",tempUser->status);
    printf("\nGender : ");scanf("%c",&tempUser->gender);
    currUser = tempUser;
    loggedin = true;
    insertNewNode(tempUser);
}
void showListOfUsers()
{
    struct node *temp;
    temp=head;

    if (head==NULL)
    {
        printf("\nNO USER FOUND");
    }

    else
    {

        printf("\n--------SoCon FAMILY---------");
        while(temp!=NULL)
        {
            printf("\n%s",temp->data->username);
            printf("\n%s\t%s",temp->data->fName,temp->data->lName);
        }
    }
}



void sendMessages() {
    clrscr();
    message *newMessage = (message *)malloc(sizeof(message));
    strcpy(newMessage->senderUsername,currUser->username);
    char recieverUsername [40];
    printf("To : ");
    scanf("%s",recieverUsername);
    if (searchUser(recieverUsername) == NULL){
        printf("\n\nNo user with such username present....\n\n");
        return;
    } else {
        printf("enter the message to send : ");scanf("%s",newMessage->message);
        FILE *fptr = fopen("messages.txt","a+");
        fwrite(&newMessage, sizeof(message),1,fptr);
        fclose(fptr);
    }
    return;
}

void recieveMessage() {
    clrscr();
    FILE *fptr = fopen("messages.txt","r");
    message *message1 = (message *) malloc(sizeof(message));
    printf("Messages\t\tSender");
    while (!feof(fptr)) {
        fread(&message1, sizeof(message),1,fptr);
        if (strcmp(message1->recieverUsername,currUser->username)){
            printf("%s\t\t%s",message1->message,message1->senderUsername);
        }
    }
}

void changeStatus() {
    clrscr();
    printf("Current Status : %s\n\n Do you want to change??[y/n]\n",currUser->status);

    char a;scanf("%c",&a);
    if (a == (char) "n"){
        return;
    } else {
        printf("Enter new status : ");
        char newStatus[200];
        scanf("%s",newStatus);
        strcpy(currUser->status,newStatus);
    }


}
void editCurrentUser() {
    clrscr();
    printf("You can change all U want\n select y or n and change whatever you want");
    user *updatedUser;
    updatedUser = currUser;

    printf("Do you want to change username??");
    char wantToUpdate,c;
    scanf("%c",&wantToUpdate);
    if (c == (char) "y"){
        printf("Your old username was %s\n",currUser->username);
        char newUsername[40];
        scanf("%s",newUsername);
        strcpy(updatedUser->username,newUsername);
    }
    printf("Do you want to change password??");
    scanf("%c",&wantToUpdate);
    if (c == (char) "y"){
        printf("Your old password was %s\n",currUser->password);
        char password[40];
        scanf("%s",password);
        strcpy(updatedUser->password,password);
    }
    printf("Do you want to change age??");

    scanf("%c",&wantToUpdate);
    if (c == (char) "y"){
        printf("Your old age was %d\n",currUser->age);
        char newAge;
        scanf("%d",newAge);
        updatedUser->age = newAge;
    }
    currUser = updatedUser;
}

void deleteCurrentUser() {
    deleteUser(currUser->username);
    loggedin = false;
    currUser = NULL;
}

void addFriend () {

}




#pragma clang diagnostic pop
