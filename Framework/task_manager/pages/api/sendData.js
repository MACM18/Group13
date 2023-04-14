// In your Next.js API route, send the data to the PHP script
export default async function handler(req, res) {
  const data = req.body;

  try {
    const response = await fetch(
      "http://localhost:8080/Group13/Framework/task_manager/pages/api/send.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      }
    );
    const responseData = await response.json();
    res.status(200).json(responseData);
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: "Something went wrong" });
  }
}
