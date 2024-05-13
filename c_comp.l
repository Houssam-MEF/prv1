%{
#include "c_comp.tab.h"
#include <stdio.h>
extern FILE *output; // Use extern to declare that output is defined elsewhere
%}

MOT_CLE        ("if"|"else"|"for"|"while"|"return"|"int"|"float"|"void")
VAR_NAME     [a-zA-Z_][a-zA-Z0-9_]*
AFFECTATION         ("=")
TYPE           ("int"|"float")
ENTIER        [0-9]+
REEL          [0-9]+"."[0-9]+
COMMENTAIRE        "//".*
STRING_LITERAL "\"[^\"]*\""
OPERATEUR       ("<"|">"|"+"|"-"|"*"|"/"|"=="|"!="|"++"|"--"|"&&"|"||")

%%

{MOT_CLE}        { fprintf(output, "Mot cle : <b>%s</b><br><br>", yytext); }
{TYPE}           { fprintf(output, "type : <b>%s</b><br><br>", yytext); }
{VAR_NAME}     { fprintf(output, "Nom de variable : <font color=blue><b>%s</b></font><br><br>", yytext); }
{COMMENTAIRE}        { /* Optionally, handle comments */ }
{AFFECTATION}         { fprintf(output, "Affectation : <b>%s</b><br><br>", yytext); }
{STRING_LITERAL} { fprintf(output, "string literal : <b>%s</b><br><br>", yytext); }
{ENTIER}        { fprintf(output, "Entier : <font color=green><b>%s</b></font><br><br>", yytext); }
{REEL}          { fprintf(output, "Reel : <font color=green><b>%s</b></font><br><br>", yytext); }
{OPERATEUR}       { fprintf(output, "Operateur : <b>%s</b><br><br>", yytext); }

%%

int yywrap(void) {
    return 1;
}
