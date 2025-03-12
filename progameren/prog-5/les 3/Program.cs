namespace les_3;

class Program
{
    static void Main(string[] args)
    {
        short aantalLeden = 10;
        Instrument drum = new("drumgeluid");
        Instrument trompet = new("trompetgeluid");
        Instrument piano = new("pianogeluid");
        Instrument gitaar = new("gitaar geluid");
        Instrument zanger = new("zanggeluid");

        Console.WriteLine("Welkom bij dit optreden van de band!");
        Console.WriteLine($"Het orkest telt momenteel {aantalLeden} leden.");
        Console.WriteLine("Het orkest gaat beginnen, wees stil alstublieft.");
        Console.WriteLine($"De drummer speelt '{drum.SpeelMijnGeluid()}'");
        Console.WriteLine($"De gitaar speelt '{gitaar.SpeelMijnGeluid()}'");
        Console.WriteLine($"De piano speelt '{piano.SpeelMijnGeluid()}'");
        Console.WriteLine($"De trompet speelt '{trompet.SpeelMijnGeluid()}'");
        Console.WriteLine($"De zanger zingt '{zanger.SpeelMijnGeluid()}'");
        Console.WriteLine("Dank voor uw aandacht en tot het volgende optreden.");
    }
}