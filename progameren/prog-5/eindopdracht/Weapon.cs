namespace eindopdracht;

// Represents a weapon item in the inventory
public class Weapon : Item
{
    // Damage dealt by the weapon
    public int Damage { get; set; }

    // Sound played when the weapon is used
    public string Sound { get; set; } = "Default weapon sound";

    // Constructor to initialize weapon properties
    public Weapon(string name, int weight, int damage, string sound = "Default weapon sound") : base(name, weight)
    {
        Damage = damage;
        Sound = sound;
    }

    // Display weapon information
    public override void DisplayInfo()
    {
        Console.WriteLine($"Wapen: {Name}, Gewicht: {Weight}, Schade: {Damage}, Geluid: {Sound}");
    }
}

