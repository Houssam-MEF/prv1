
int main()
{
    int i = 0;
    float temp = 2.19;

    // Boucle
    for (i = 0; i < 8; i++) {
        if (i < 6) {
            // Commentaire ligne 9
            temp = temp + i;
        } else {
            temp = temp - i;
        }
    }
    return 0;
}
