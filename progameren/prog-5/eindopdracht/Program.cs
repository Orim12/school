using System;

namespace eindopdracht;


class Program
{
    static void Main()
    {
        bool exit = false;
        
        while (!exit)
        {
            Console.Clear();
            Console.WriteLine("=== Inventory Menu ===");
            Console.WriteLine("1. Voeg een wapen toe");
            Console.WriteLine("2. Voeg een drankje toe");
            Console.WriteLine("3. Verwijder een item (wapen of drankje)");
            Console.WriteLine("4. Gebruik een drankje om te herstellen");
            Console.WriteLine("5. Toon overzicht van je inventory");
            Console.WriteLine("6. Voeg drankje toe met kleur");
            Console.WriteLine("0. Afsluiten");
            Console.Write("Kies een optie: ");

            string Keuze = Console.ReadLine();
            switch (Keuze)
            {
                case "1":
                    // Voeg een wapen toe
                    break;
                case "2":
                    //voeg een standard drankje toe
                    break;
                case "3":
                    // Verwijder een item
                    break;
                case "4":
                    // Gebruik een drankje
                    break;
                case "5":
                    // Toon overzicht van inventory
                    break;
                case "6":
                    // Voeg drankje toe met kleur
                    break;
                case "0":
                    Console.WriteLine("Afsluiten...");
                    exit = true;
                    break;
                default:
                    Console.WriteLine("Ongeldige keuze.");
                    break;
            }
            
            if (!exit)
            {
                Console.WriteLine("\nDruk op een toets om verder te gaan...");
                Console.ReadKey();
            }
        }
    }
}
