using System;
using System.Text.Json;
using System.Text.Json.Serialization;

namespace DefaultNamespace;

public class ItemJsonConverter : JsonConverter<Item>
{
    public override Item Read(ref Utf8JsonReader reader, Type typeToConvert, JsonSerializerOptions options)
    {
        using (JsonDocument doc = JsonDocument.ParseValue(ref reader))
        {
            var root = doc.RootElement;
            string type = root.GetProperty("Type").GetString();
            return type switch
            {
                "Weapon" => JsonSerializer.Deserialize<Weapon>(root.GetRawText(), options),
                "Potion" => JsonSerializer.Deserialize<Potion>(root.GetRawText(), options), // Ensure Potion is deserialized correctly
                _ => throw new NotSupportedException($"Type {type} is niet ondersteund.")
            };
        }
    }

    public override void Write(Utf8JsonWriter writer, Item value, JsonSerializerOptions options)
    {
        writer.WriteStartObject();
        writer.WriteString("Type", value.GetType().Name);
        foreach (var property in value.GetType().GetProperties())
        {
            writer.WritePropertyName(property.Name);
            JsonSerializer.Serialize(writer, property.GetValue(value), options);
        }
        writer.WriteEndObject();
    }
}
