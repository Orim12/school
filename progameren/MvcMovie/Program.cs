using Microsoft.EntityFrameworkCore;
using MvcMovie.Models;

namespace MvcMovie;

public class Program
{
    public static void Main(string[] args)
    {
        var builder = WebApplication.CreateBuilder(args);

        // Add services to the container.
        builder.Services.AddControllersWithViews();

        // Add the database context
        builder.Services.AddDbContext<MvcMovieContext>(options =>
            options.UseSqlite(builder.Configuration.GetConnectionString("MvcMovieContext")));

        var app = builder.Build();

        // Seed the database
        using (var scope = app.Services.CreateScope())
        {
            var services = scope.ServiceProvider;
            SeedData.Initialize(services);
        }

        // Configure the HTTP request pipeline.
        if (!app.Environment.IsDevelopment())
        {
            app.UseExceptionHandler("/Home/Error");
            // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
            app.UseHsts();
        }

        app.UseHttpsRedirection();
        app.UseRouting();

        app.UseAuthorization();

        app.MapStaticAssets();
        app.MapControllerRoute(
            name: "default",
            pattern: "{controller=Home}/{action=Index}/{id?}")
            .WithStaticAssets();

        app.MapControllerRoute(
            name: "helloWorld",
            pattern: "{controller=HelloWorld}/{action=Index}/{id?}");

        app.MapControllerRoute(
            name: "movie",
            pattern: "{controller=Movie}/{action=Index}/{id?}");

        app.Run();
    }
}