using Microsoft.AspNetCore.Mvc;
using System;

namespace MvcMovie.Controllers
{
    public class HelloWorldController : Controller
    {
        // GET: /HelloWorld/
        public IActionResult Index()
        {
            ViewData["Title"] = "Hello World - Index";
            return View();
        }

        // GET: /HelloWorld/Welcome/
        public IActionResult Welcome(string name)
        {
            ViewData["Title"] = "Hello World - Welcome";
            ViewData["Name"] = name;
            ViewData["CurrentDateTime"] = DateTime.Now.ToString("F");
            return View();
        }
    }
}
