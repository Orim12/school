namespace les_3
{
    public class Dirigent
    {
        public static string GeefAanwijzingen()
        {
            var instruments = new List<string> { "drum", "trompet", "piano", "gitaar", "zanger" };
            var random = new Random();
            var randomizedInstruments = instruments.OrderBy(x => random.Next()).ToList();
            return string.Join(", ", randomizedInstruments);
        }
    }
}