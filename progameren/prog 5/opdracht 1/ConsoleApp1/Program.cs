using System;

namespace ConsoleApp1;

class Program
{
    static void Main(string[] args)
    {
        Console.WriteLine("when were you born?");
        var input = Console.ReadLine();
        var date = DateTime.Now.ToString("dd-MM-yyyy");

        if (DateTime.TryParse(input, out var birthdate))
        {
            var age = DateTime.Now.Year - birthdate.Year;
            if (birthdate.Date > DateTime.Now.AddYears(-age)) age--;
            if (age >= 18) {
                Console.WriteLine("Drink bier in plaats van water, dan heb je morgen een flinke kater");
            } else {
                Console.WriteLine("Je mag nog geen alcohol drinken.");
            }
        }
        else
        {
            Console.WriteLine("Invalid date");
        }
    }
}
