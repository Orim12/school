using Microsoft.AspNetCore.Mvc;
using System;

namespace MvcMovie.Controllers
{
    public class HelloWorldController : Controller
    {
        // GET: /HelloWorld/
        public IActionResult Index()
        {
            return Content("Hello, mijn naam is [Jouw Naam]!");
        }

        // GET: /HelloWorld/Welcome/
        public IActionResult Welcome(string name)
        {
            string currentDateTime = DateTime.Now.ToString("F");
            return Content($"Welkom {name}, de huidige datum en tijd is: {currentDateTime}");
        }
    }
}
