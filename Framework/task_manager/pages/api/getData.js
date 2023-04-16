// Import the required libraries


// Define the API route handler function
export default async function handler(req, res) {
  // Fetch the data from the PHP script
  const response = await fetch(
    "http://localhost:8080/Group13/Framework/task_manager/pages/api/file.php"
  );
  const data = await response.json();

  // Return the data as JSON
  res.status(200).json(data);
}
