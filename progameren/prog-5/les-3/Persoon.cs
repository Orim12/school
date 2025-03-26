namespace les_3
{
    public abstract class Persoon
    {
        public string Naam { get; set; }
        public string Adres { get; set; }

        public Persoon(string naam, string adres)
        {
            Naam = naam;
            Adres = adres;
        }

        public abstract void DoeIets();
    }
}