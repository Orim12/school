using System;
using System.Collections.Generic;

namespace eindopdracht;

class Program
{
    static void Main()
    {
        Inventory inventory = new Inventory();
        inventory.LoadFromFile(); // Load inventory from file
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
            Console.WriteLine("7. Speel geluid van een item af");
            Console.WriteLine("0. Afsluiten");
            Console.Write("Kies een optie: ");

            string keuze = Console.ReadLine();
            switch (keuze)
            {
                case "1":
                    Console.Write("Naam van het wapen: ");
                    string weaponName = Console.ReadLine();
                    Console.Write("Gewicht van het wapen: ");
                    int weaponWeight = int.Parse(Console.ReadLine());
                    Console.Write("Schade van het wapen: ");
                    int weaponDamage = int.Parse(Console.ReadLine());
                    inventory.AddItem(new Weapon(weaponName, weaponWeight, weaponDamage));
                    break;
                case "2":
                    Console.Write("Naam van het drankje: ");
                    string potionName = Console.ReadLine();
                    Console.Write("Gewicht van het drankje: ");
                    int potionWeight = int.Parse(Console.ReadLine());
                    Console.Write("Herstelwaarde van het drankje: ");
                    int healAmount = int.Parse(Console.ReadLine());
                    inventory.AddItem(new Potion(potionName, potionWeight, healAmount));
                    inventory.SaveToFile(); // Save inventory after adding a potion
                    break;
                case "3":
                    Console.WriteLine("Wat wil je verwijderen?");
                    inventory.ShowInventory(); // Show inventory with numbers
                    Console.Write("Kies het nummer van het item om te verwijderen: ");
                    if (int.TryParse(Console.ReadLine(), out int removeIndex))
                    {
                        inventory.RemoveItemByIndex(removeIndex - 1); // Adjust for 0-based index
                    }
                    else
                    {
                        Console.WriteLine("Ongeldige invoer.");
                    }
                    break;
                case "4":
                    Console.WriteLine("Welke drankje wil je gebruiken?");
                    inventory.ShowInventory(typeof(Potion)); // Show only potions
                    Console.Write("Kies het nummer van het drankje om te gebruiken: ");
                    if (int.TryParse(Console.ReadLine(), out int useIndex))
                    {
                        inventory.UseItemByIndex(useIndex - 1); // Adjust for 0-based index
                    }
                    else
                    {
                        Console.WriteLine("Ongeldige invoer.");
                    }
                    break;
                case "5":
                    inventory.ShowInventory();
                    break;
                case "6":
                    Console.Write("Naam van het drankje: ");
                    string coloredPotionName = Console.ReadLine();
                    Console.Write("Gewicht van het drankje: ");
                    int coloredPotionWeight = int.Parse(Console.ReadLine());
                    Console.Write("Herstelwaarde van het drankje: ");
                    int coloredHealAmount = int.Parse(Console.ReadLine());
                    Console.Write("Kleur van het drankje: ");
                    string color = Console.ReadLine();
                    inventory.AddItem(new Potion(coloredPotionName, coloredPotionWeight, coloredHealAmount) { Color = color });
                    inventory.SaveToFile(); // Save inventory after adding a colored potion
                    break;
                case "7":
                    Console.WriteLine("Van welk item wil je het geluid afspelen?");
                    inventory.ShowInventory(); // Show inventory with numbers
                    Console.Write("Kies het nummer van het item: ");
                    if (int.TryParse(Console.ReadLine(), out int soundIndex))
                    {
                        inventory.PlayItemSoundByIndex(soundIndex - 1); // Adjust for 0-based index
                    }
                    else
                    {
                        Console.WriteLine("Ongeldige invoer.");
                    }
                    break;
                case "0":
                    Console.WriteLine("Afsluiten...");
                    inventory.SaveToFile(); // Save inventory to file
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

