namespace les_3
{
    public class Muzikant
    {
        public void SpeelMuziek(string aanwijzingen)
        {
            var instrumenten = new Dictionary<string, Instrument>
            {
                { "drum", new Instrument("drumgeluid") },
                { "trompet", new Instrument("trompetgeluid") },
                { "piano", new Instrument("pianogeluid") },
                { "gitaar", new Instrument("gitaar geluid") },
                { "zanger", new Instrument("zanggeluid") }
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