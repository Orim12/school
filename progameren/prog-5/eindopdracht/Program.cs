using System;
using System.Collections.Generic;

namespace eindopdracht;

class Program
{
    static void Main()
    {
        // Initialize inventory and load items from file
        Inventory inventory = new Inventory();
        inventory.LoadFromFile(); // Load inventory from file
        bool exit = false;

        while (!exit)
        {
            // Display the menu
            Console.Clear();
            Console.WriteLine("=== Inventory Menu ===");
            Console.WriteLine("1. Voeg een wapen toe"); // Add a weapon
            Console.WriteLine("2. Voeg een drankje toe"); // Add a potion
            Console.WriteLine("3. Verwijder een item (wapen of drankje)"); // Remove an item
            Console.WriteLine("4. Gebruik een drankje om te herstellen"); // Use a potion
            Console.WriteLine("5. Toon overzicht van je inventory"); // Show inventory
            Console.WriteLine("6. Voeg drankje toe met kleur"); // Add a potion with color
            Console.WriteLine("7. Speel geluid van een item af"); // Play item sound
            Console.WriteLine("0. Afsluiten"); // Exit
            Console.Write("Kies een optie: ");

            string keuze = Console.ReadLine();
            switch (keuze)
            {
                case "1":
                    // Add a weapon to the inventory
                    Console.Write("Naam van het wapen: ");
                    string weaponName = Console.ReadLine();
                    Console.Write("Gewicht van het wapen: ");
                    int weaponWeight = int.Parse(Console.ReadLine());
                    Console.Write("Schade van het wapen: ");
                    int weaponDamage = int.Parse(Console.ReadLine());
                    inventory.AddItem(new Weapon(weaponName, weaponWeight, weaponDamage));
                    break;
                case "2":
                    // Add a potion to the inventory
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
                    // Remove an item by index
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
                    // Use a potion by index
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
                    // Show the full inventory
                    inventory.ShowInventory();
                    break;
                case "6":
                    // Add a potion with a color property
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
                    // Play the sound of an item by index
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
                    // Exit the program
                    Console.WriteLine("Afsluiten...");
                    inventory.SaveToFile(); // Save inventory to file
                    exit = true;
                    break;
                default:
                    // Handle invalid input
                    Console.WriteLine("Ongeldige keuze.");
                    break;
            }

            // Pause before returning to the menu
            if (!exit)
            {
                Console.WriteLine("\nDruk op een toets om verder te gaan...");
                Console.ReadKey();
            }
        }
    }
}

