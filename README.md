# Math Facts API

## Overview
The **Math Facts API** is a simple RESTful API that takes a number as input and returns interesting mathematical properties about it, including whether it is prime, perfect, or an Armstrong number. It also provides a fun fact about the number.

## Features
- Checks if a number is prime.
- Determines if a number is a perfect number.
- Identifies Armstrong numbers.
- Provides a list of relevant mathematical properties** (odd, even, etc.).
- Calculates the sum of digits.
- Fetches a fun fact about the number.
- Supports CORS (Cross-Origin Resource Sharing).
- Returns responses in JSON format.

## API Endpoint
### GET Request:
```
/index.php?number={number}
```

## Request Parameters
| Parameter | Type   | Required | Description |
|-----------|--------|----------|-------------|
| `number`  | int    | Yes      | The number to analyze |

## Example Request
```
GET /index.php?number=371
```

## Example Response
```json
{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```

## Error Handling
If the `number` parameter is missing or invalid, the API returns:
```json
{
  "error": true,
  "number": "boy"
}
```

## Deployment
- Host the `index.php` file on a publicly accessible server.
- Ensure the server supports PHP execution.


