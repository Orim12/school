using System.Text.Json.Serialization;

namespace eindopdracht;

[JsonConverter(typeof(ItemJsonConverter))]
abstract public class Item
{
    public string Name { get; set; }
    public int Weight { get; set; }

    protected Item() { } // Default constructor for deserialization

    protected Item(string name, int weight)
    {
        Name = name;
        Weight = weight;
    }

    protected Item(string name) : this(name, 0) { }

    public abstract void DisplayInfo();
}
