using System.Text.Json.Serialization;

namespace eindopdracht;

// Abstract base class for all inventory items
[JsonConverter(typeof(ItemJsonConverter))]
abstract public class Item
{
    // Name of the item
    public string Name { get; set; }

    // Weight of the item
    public int Weight { get; set; }

    // Default constructor for deserialization
    protected Item() { }

    // Constructor to initialize name and weight
    protected Item(string name, int weight)
    {
        Name = name;
        Weight = weight;
    }

    // Constructor to initialize name with default weight
    protected Item(string name) : this(name, 0) { }

    // Abstract method to display item information
    public abstract void DisplayInfo();
}
