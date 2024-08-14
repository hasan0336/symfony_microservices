
# Symfony Microservices Project

This project is a Symfony-based application with two microservices (`users` and `notifications`) that communicate via a message bus.

## Features

- **Users Service**: 
  - Endpoint: `POST /users`
  - Accepts JSON data with `email`, `firstName`, and `lastName`.
  - Stores the data in a log file and dispatches an event to the message bus.

- **Notifications Service**:
  - Listens for the user creation event.
  - Logs the received data into a log file.

## Project Structure

- **Users**: Handles user creation and event dispatching.
- **Notifications**: Consumes events from the `users` service.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/hasan0336/symfony_microservices.git
   cd symfony-microservices-project
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Setup environment variables**:
   Copy `.env.example` to `.env` and update the necessary environment variables.

4. **Run the application**:
   ```bash
   symfony serve
   ```

## Running Tests

- **Unit Tests**:
  ```bash
  ./bin/phpunit --testsuite=unit
  ```

- **Integration Tests**:
  ```bash
  ./bin/phpunit --testsuite=integration
  ```

- **Functional Tests**:
  ```bash
  ./bin/phpunit --testsuite=functional
  ```

## Docker Setup

To run the services in Docker:

1. **Build and run containers**:
   ```bash
   docker-compose up --build
   ```

2. The services will be available on `http://localhost:8000`.

## Development Notes

- Symfony is used as the framework for this project.
- Message Bus is used for communication between microservices.
- Data is stored in log files rather than a database.

## Additional Tools

- Symfony CLI is used for local development.
- PHPUnit is used for testing.

## Contributing

Feel free to open issues and submit pull requests.

## License

This project is licensed under the MIT License.
