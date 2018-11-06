using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp3
{
    class Program
    {
        static void Main(string[] args)
        {
             string[] pilotos = new string[4] { "Ayrton Senna", "Michael Schumacher", "Lewis Hamilton", "Alain Prost" };
                Console.WriteLine(pilotos[3]);
                Console.WriteLine();
                pilotos[3] = "Rubens Barrichello";
            foreach (string piloto in pilotos)
            {
                Console.WriteLine(piloto);
            }
            Console.ReadKey();

            
        }
    }
    }

