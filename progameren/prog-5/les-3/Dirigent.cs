namespace les_3
{
    public class Dirigent : Persoon
    {
        public Dirigent(string naam, string adres) : base(naam, adres) { }

        public override void DoeIets()
        {
            Console.WriteLine($"{Naam} geeft aanwijzingen.");
        }

        public static string GeefAanwijzingen()
        {
            var instruments = new List<string> { "drum", "trompet", "piano", "gitaar", "zanger" };
            var random = new Random();
            var randomizedInstruments = instruments.OrderBy(x => random.Next()).ToList();
            return string.Join(", ", randomizedInstruments);
        }
    }
}