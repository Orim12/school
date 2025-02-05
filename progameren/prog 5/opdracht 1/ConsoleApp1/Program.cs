using System;

namespace ConsoleApp1;

class Program
{
    static void Main(string[] args)
    {
        Console.WriteLine("when were you born?");
        var input = Console.ReadLine();
        var date = DateTime.Now.ToString("dd-MM-yyyy");
    }
}
