class Program
{ 
    static void Main(string[] args)
    {
        Orkest orkest = new Orkest();
        orkest.Dirigeer();
    }

    class Orkest
    {
        public void Dirigeer()
        {
            int aantalkeer = 10;
            //huidig aantal leden.
            int aantalOrkestleden = 11;
            //Het orkest!
            //welkom heten
            Console.WriteLine(Welkom());
            //vertel over het orkest
            Console.WriteLine(VertelOverOrkest(aantalOrkestleden));
            //start van het concert
            Console.WriteLine(StartConcert());
            //drums aansturen!
            Console.WriteLine(Speeldrums(aantalkeer));
            // sluiting
            Console.WriteLine(Sluiting());
        }

        public string Speeldrums(int drum)
        {
            string result = "";
            for (int i = 0; i < drum; i++)
            {
                result += "Bomberdebom\n";
            }
            return result.Trim();
        }

        private string Welkom()
        {
            return "Welkom bij dit optreden van de band!";
        }

        private string VertelOverOrkest(int aantalOrkestleden)
        {
            return $"Het orkest telt momenteel {aantalOrkestleden} leden.";
        }

        private string StartConcert()
        {
            return "Het orkest gaat beginnen, wees stil alstublieft.";
        }

        private string Sluiting()
        {
            return "Dank voor uw aandacht en tot het volgende optreden.";
        }
    }
}