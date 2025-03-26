namespace les_3;

public class Instrument : Persoon
{
    readonly string mijnGeluid;

    public Instrument(string naam, string adres, string geluid) : base(naam, adres)
    {
        mijnGeluid = geluid;
    }

    public override void DoeIets()
    {
        Console.WriteLine($"{Naam} speelt {mijnGeluid}.");
    }

    public string SpeelMijnGeluid()
    {
        return mijnGeluid;
    }
}




