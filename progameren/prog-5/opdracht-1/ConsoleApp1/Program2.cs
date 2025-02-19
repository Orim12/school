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
            Welkom();
            //vertel over het orkest
            VertelOverOrkest(aantalOrkestleden);
            //start van het concert
            StartConcert();
            //drums aansturen!
            Speeldrums(aantalkeer);
            // sluiting
            Sluiting();
        }

        public void Speeldrums(int drum)
        {
            for (int i = 0; i < drum; i++)
            {
                Console.WriteLine("Bomberdebom");
            }
        }

        private void Welkom()
        {
            Console.WriteLine("Welkom bij dit optreden van de band!");
        }

        private void VertelOverOrkest(int aantalOrkestleden)
        {
            Console.WriteLine($"Het orkest telt momenteel {aantalOrkestleden} leden.");
        }

        private void StartConcert()
        {
            Console.WriteLine("Het orkest gaat beginnen, wees stil alstublieft.");
        }

        private void Sluiting()
        {
            Console.WriteLine("Dank voor uw aandacht en tot het volgende optreden.");
        }
    }
}