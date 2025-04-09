namespace eindopdracht;

public class Weapon : Item
{
    public int Damage { get; set; }
    public string Sound { get; set; } = "Default weapon sound"; // Default sound

    public Weapon(string name, int weight, int damage, string sound = "Default weapon sound") : base(name, weight)
    {
        Damage = damage;
        Sound = sound;
    }

    public override void DisplayInfo()
    {
        Console.WriteLine($"Wapen: {Name}, Gewicht: {Weight}, Schade: {Damage}, Geluid: {Sound}");
    }
}

