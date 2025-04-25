namespace eindopdracht;

// Represents a potion item in the inventory
public class Potion : Item, IUsable
{
    // Amount of health restored by the potion
    public int HealAmount { get; set; }

    // Color of the potion
    public string Color { get; set; }

    // Sound played when the potion is used
    public string Sound { get; set; } = "Default potion sound";

    // Constructor to initialize potion properties
    public Potion(string name, int weight, int healAmount, string sound = "Default potion sound") : base(name, weight)
    {
        HealAmount = healAmount;
        Sound = sound;
    }

    // Default constructor for deserialization
    public Potion() : base("") { }

    // Use the potion and display its effects
    public void Use()
    {
        Console.WriteLine($"{Name} is gebruikt en herstelt {HealAmount} HP.");
        Console.WriteLine($"Geluid: {Sound}"); // Play sound when potion is used
    }

    // Display potion information
    public override void DisplayInfo()
    {
        Console.WriteLine($"Drankje: {Name}, Gewicht: {Weight}, Herstelwaarde: {HealAmount}, Kleur: {Color ?? "Onbekend"}, Geluid: {Sound}");
    }
}
