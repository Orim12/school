namespace ConsoleApp1
{
    class Program3
    { 
        static void Main(string[] args)
        {
            Orkest orkest = new Orkest();
            Drum drum = new Drum();
            Trompet trompet = new Trompet();

            orkest.Welkom();
            Console.WriteLine(drum.Speeldrums());
            Console.WriteLine(trompet.Speeltrompet());
        }
    }
}