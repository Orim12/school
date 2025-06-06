using System.Text.Json;
using System.Text.Json.Serialization;

namespace eindopdracht;

// Custom JSON converter for the abstract Item class
public class ItemJsonConverter : JsonConverter<Item>
{
    // Deserialize JSON into the appropriate Item subclass
    public override Item Read(ref Utf8JsonReader reader, Type typeToConvert, JsonSerializerOptions options)
    {
        using (JsonDocument doc = JsonDocument.ParseValue(ref reader))
        {
            var root = doc.RootElement;
            string type = root.GetProperty("Type").GetString();
            return type switch
            {
                "Weapon" => JsonSerializer.Deserialize<Weapon>(root.GetRawText(), options),
                "Potion" => JsonSerializer.Deserialize<Potion>(root.GetRawText(), options),
                _ => throw new NotSupportedException($"Type {type} is niet ondersteund.")
            };
        }
    }

    // Serialize an Item object into JSON
    public override void Write(Utf8JsonWriter writer, Item value, JsonSerializerOptions options)
    {
        writer.WriteStartObject();
        writer.WriteString("Type", value.GetType().Name); // Write the type of the item
        foreach (var property in value.GetType().GetProperties())
        {
            writer.WritePropertyName(property.Name);
            JsonSerializer.Serialize(writer, property.GetValue(value), options); // Serialize each property
        }
        writer.WriteEndObject();
    }
}
