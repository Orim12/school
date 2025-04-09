namespace eindopdracht;

public class Potion : Item, IUsable
{
    public int HealAmount { get; set; }
    public string Color { get; set; }
    public string Sound { get; set; } = "Default potion sound"; // Default sound

    public Potion(string name, int weight, int healAmount, string sound = "Default potion sound") : base(name, weight)
    {
        HealAmount = healAmount;
        Sound = sound;
    }

    // Ensure default constructor for deserialization
    public Potion() : base("") { }

    public void Use()
    {
        Console.WriteLine($"{Name} is gebruikt en herstelt {HealAmount} HP.");
        Console.WriteLine($"Geluid: {Sound}"); // Play sound when potion is used
    }

    public override void DisplayInfo()
    {
        Console.WriteLine($"Drankje: {Name}, Gewicht: {Weight}, Herstelwaarde: {HealAmount}, Kleur: {Color ?? "Onbekend"}, Geluid: {Sound}");
    }
}
