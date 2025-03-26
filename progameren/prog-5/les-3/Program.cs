namespace les_3;

class Program
{
    static void Main(string[] args)
    {
        short aantalLeden = 10;
        Muzikant muzikant = new("Jan", "Straat 1, Stad");
        Dirigent dirigent = new("Piet", "Straat 2, Stad");
        string aanwijzingen = Dirigent.GeefAanwijzingen();

        Console.WriteLine("Welkom bij dit optreden van de band!");
        Console.WriteLine($"Het orkest telt momenteel {aantalLeden} leden.");
        Console.WriteLine("Het orkest gaat beginnen, wees stil alstublieft.");
        muzikant.SpeelMuziek(aanwijzingen);

        Console.WriteLine("Dank voor uw aandacht en tot het volgende optreden.");
    }
}