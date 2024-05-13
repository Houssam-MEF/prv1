%{
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
void yyerror(const char *s);
int yylex(void);
extern FILE *yyin;
FILE *output;
%}

%token MOT_CLE VAR_NAME AFFECTATION TYPE ENTIER REEL COMMENTAIRE STRING_LITERAL OPERATEUR
%token IF ELSE FOR WHILE RETURN INT REEL VOID

%start program

%%

program:
    | program statement
    ;

statement:
      function_definition
    | declaration ';'
    | assignment_statement ';'
    | if_statement
    | for_loop
    | while_loop
    | COMMENTAIRE { printf("COMMENTAIRE: %s\n", $1); }
    ;

function_definition:
    TYPE IDENTIFIER '(' ')' '{' statements '}' { printf("Function: %s\n", $2); }
    ;

declaration:
    TYPE IDENTIFIER { printf("Declaration: %s %s\n", $1, $2); }
    ;

assignment_statement:
    IDENTIFIER ASSIGN expression { printf("Affectation: %s\n", $1); }
    ;

if_statement:
    IF '(' expression ')' statement ELSE statement { printf("If-Else Statement\n"); }
    | IF '(' expression ')' statement { printf("If Statement\n"); }
    ;

for_loop:
    FOR '(' expression ';' expression ';' expression ')' statement { printf("For Loop\n"); }
    ;

while_loop:
    WHILE '(' expression ')' statement { printf("While Loop\n"); }
    ;

expression:
      ENTIER
    | REEL
    | VAR_NAME
    | expression OPERATEUR expression
    ;

statements:
    | statements statement
    ;

%%

void yyerror(const char *s) {
    fprintf(stderr, "Error: %s\n", s);
}

int main(int argc, char **argv) {
    if (argc > 1) {
        yyin = fopen(argv[1], "r");
        if (!yyin) {
            perror(argv[1]);
            return 1;
        }
    } else {
        fprintf(stderr, "Usage: %s <filename>\n", argv[0]);
        return 1;
    }

    output = fopen("index.html", "w");
    fprintf(output, "<html><body>");
    yyparse();
    fprintf(output, "</body></html>");
    fclose(output);

    if (yyin) fclose(yyin);
    return 0;
}
