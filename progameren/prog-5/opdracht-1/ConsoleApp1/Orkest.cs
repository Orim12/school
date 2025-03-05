using System;

namespace ConsoleApp1
{
    class Orkest {
        int aantalOrkestLeden = 11;

        public void Welkom() {
            Console.WriteLine("Welkom bij dit optreden van de band!");
            Console.WriteLine($"Het orkest telt momenteel {aantalOrkestLeden} leden.");
        }
    }
}