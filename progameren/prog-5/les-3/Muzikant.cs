namespace les_3
{
    public class Muzikant : IPersoon
    {
        public string Naam { get; set; }
        public string Adres { get; set; }

        public Muzikant(string naam, string adres)
        {
            Naam = naam;
            Adres = adres;
        }

        public void DoeIets()
        {
            Console.WriteLine($"{Naam} speelt muziek.");
        }

        public void SpeelMuziek(string aanwijzingen)
        {
            var instrumenten = new Dictionary<string, Instrument>
            {
                { "drum", new Instrument("Drummer", "Straat 3, Stad", "drumgeluid") },
                { "trompet", new Instrument("Trompettist", "Straat 4, Stad", "trompetgeluid") },
                { "piano", new Instrument("Pianist", "Straat 5, Stad", "pianogeluid") },
                { "gitaar", new Instrument("Gitarist", "Straat 6, Stad", "gitaar geluid") },
                { "zanger", new Instrument("Zanger", "Straat 7, Stad", "zanggeluid") }
            };

            var aanwijzingenLijst = aanwijzingen.Split(", ");
            foreach (var instrument in aanwijzingenLijst)
            {
                if (instrumenten.ContainsKey(instrument))
                {
                    Console.WriteLine($"De {instrument} speelt '{instrumenten[instrument].SpeelMijnGeluid()}'");
                }
            }
        }
    }
}