namespace les_3;

public class Instrument : IPersoon
{
    public string Naam { get; set; }
    public string Adres { get; set; }
    readonly string mijnGeluid;

    public Instrument(string naam, string adres, string geluid)
    {
        Naam = naam;
        Adres = adres;
        mijnGeluid = geluid;
    }

    public void DoeIets()
    {
        Console.WriteLine($"{Naam} speelt {mijnGeluid}.");
    }

    public string SpeelMijnGeluid()
    {
        return mijnGeluid;
    }
}




