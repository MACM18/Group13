import { useState, useEffect } from "react";

export default function test() {
  const [data, setData] = useState([]);

  useEffect(() => {
    async function fetchData() {
      const res = await fetch("/api/getData");
      const json = await res.json();
      setData(json);
    }

    fetchData();
  }, []);

  // Render the data
  return (
    <div>
      {data.map((item) => (
        <p key={item.id}>{item.name}<h1>{item.price}</h1></p>
      ))}
    </div>
  );
}
