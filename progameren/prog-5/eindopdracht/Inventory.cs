using System.Text.Json;

namespace eindopdracht;

public class Inventory
{
    // List to store all items in the inventory
    private List<Item> Items { get; set; } = new List<Item>();

    // Property to store sound (if applicable)
    public string Sound { get; set; }

    // File path for saving and loading inventory data
    private const string FilePath = "inventory.json";

    // Add an item to the inventory
    public void AddItem(Item item)
    {
        Items.Add(item);
        Console.WriteLine($"{item.Name} is toegevoegd aan de inventory.");
    }

    // Remove an item by name and type
    public void RemoveItem(string itemName, string itemType)
    {
        Item item = Items.Find(i => i.Name == itemName &&
                                    ((itemType == "Weapon" && i is Weapon) ||
                                     (itemType == "Potion" && i is Potion)));
        if (item != null)
        {
            Items.Remove(item);
            Console.WriteLine($"{itemName} ({itemType}) is verwijderd uit de inventory.");
            SaveToFile(); // Save inventory after removing an item
        }
        else
        {
            Console.WriteLine($"{itemName} ({itemType}) niet gevonden in de inventory.");
        }
    }

    // Remove an item by its index in the list
    public void RemoveItemByIndex(int index)
    {
        if (index >= 0 && index < Items.Count)
        {
            Item item = Items[index];
            Items.RemoveAt(index);
            Console.WriteLine($"{item.Name} is verwijderd uit de inventory.");
            SaveToFile(); // Save inventory after removal
        }
        else
        {
            Console.WriteLine("Ongeldige index.");
        }
    }

    // Use an item by name (only works for potions)
    public void UseItem(string itemName)
    {
        // Find the item by name and ensure it is of type Potion
        Item item = Items.Find(i => i.Name == itemName && i is Potion);
        if (item is Potion potion && potion is IUsable usable)
        {
            usable.Use();
            Items.Remove(item); // Remove the used item from the inventory
            SaveToFile(); // Save the updated inventory to the file
            Console.WriteLine($"{itemName} is verwijderd uit de inventory na gebruik.");
        }
        else
        {
            Console.WriteLine($"{itemName} is niet gevonden of is geen drankje.");
        }
    }

    // Use an item by its index (only works for potions)
    public void UseItemByIndex(int index)
    {
        if (index >= 0 && index < Items.Count)
        {
            Item item = Items[index];
            if (item is Potion potion && potion is IUsable usable)
            {
                usable.Use();
                Items.RemoveAt(index); // Remove the used item
                SaveToFile(); // Save inventory after usage
                Console.WriteLine($"{item.Name} is verwijderd uit de inventory na gebruik.");
            }
            else
            {
                Console.WriteLine($"{item.Name} is geen drankje en kan niet worden gebruikt.");
            }
        }
        else
        {
            Console.WriteLine("Ongeldige index.");
        }
    }

    // Display the inventory, optionally filtered by type
    public void ShowInventory(Type? filterType = null)
    {
        Console.Clear();
        Console.WriteLine("=== Inventory Overzicht ===");
        for (int i = 0; i < Items.Count; i++)
        {
            if (filterType == null || Items[i].GetType() == filterType)
            {
                Console.WriteLine($"{i + 1}. {Items[i].Name} ({Items[i].GetType().Name})");
            }
        }
    }

    // Save the inventory to a JSON file
    public void SaveToFile()
    {
        try
        {
            string json = JsonSerializer.Serialize(Items, new JsonSerializerOptions { WriteIndented = true });
            File.WriteAllText(FilePath, json);
            Console.WriteLine("Inventory opgeslagen in inventory.json.");
        }
        catch (Exception ex)
        {
            Console.WriteLine($"Fout bij opslaan: {ex.Message}");
        }
    }

    // Load the inventory from a JSON file
    public void LoadFromFile()
    {
        try
        {
            if (File.Exists(FilePath))
            {
                string json = File.ReadAllText(FilePath);
                Items = JsonSerializer.Deserialize<List<Item>>(json, new JsonSerializerOptions
                {
                    Converters = { new ItemJsonConverter() }
                }) ?? new List<Item>();
                Console.WriteLine("Inventory geladen uit inventory.json.");
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine($"Fout bij laden: {ex.Message}");
        }
    }

    // Play the sound associated with an item by its index
    public void PlayItemSoundByIndex(int index)
    {
        if (index >= 0 && index < Items.Count)
        {
            Item item = Items[index];
            if (item is Weapon weapon)
            {
                Console.WriteLine($"Geluid van {weapon.Name}: {weapon.Sound}");
            }
            else if (item is Potion potion)
            {
                Console.WriteLine($"Geluid van {potion.Name}: {potion.Sound}");
            }
            else
            {
                Console.WriteLine("Dit item heeft geen geluid.");
            }
        }
        else
        {
            Console.WriteLine("Ongeldige index.");
        }
    }
}
