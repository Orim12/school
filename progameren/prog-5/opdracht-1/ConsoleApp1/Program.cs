namespace ConsoleApp1;

class Program 

{
    static void Main(string[] args)
    {
		int aantalOrkestLeden = 11;
		string drum = "bomberdebom";
		string trompet = "tadadadaaa";
		string piano = "pling pling pling";
		string gitaar = "sjang sjang";
		string zanger = "Lalalalalaaaa!";
		bool orkestSpeelt = true;
		bool orkestPlayed = false;

		Console.WriteLine("Welkom bij dit optreden van de band!");
		Console.WriteLine($"Het orkest telt momenteel {aantalOrkestLeden} leden.");
		if (orkestSpeelt == true) {
			Console.WriteLine("Het orkest gaat beginnen, wees stil alstublieft.");
			Console.WriteLine($"De drum speelt '{drum}'");
			Console.WriteLine($"De trompet speelt '{trompet}'.");
			Console.WriteLine($"De piano speelt '{piano}'.");
			Console.WriteLine($"De gitaar speelt '{gitaar}'.");
			Console.WriteLine($"De zanger zingt '{zanger}'.");
			orkestSpeelt = false;
			orkestPlayed = true;
		} else {
			Console.WriteLine("Het orkest speelt niet.");
		}

		if (orkestSpeelt == false && orkestPlayed == true) {
			Console.WriteLine("Dank voor uw aandacht en tot het volgende optreden."); 
		}
    }
}