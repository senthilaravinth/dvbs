public class App {
    public static boolean isPrime(int n) {
        if (n <= 1) return false;
        for (int i = 2; i <= Math.sqrt(n); i++) {
            if (n % i == 0) return false;
        }
        return true;
    }

    public static void main(String[] args) {
        int numberToCheck = 29; 
        System.out.println("--- KUBERNETES PRIME CHECKER ---");
        if (isPrime(numberToCheck)) {
            System.out.println("OUTPUT: " + numberToCheck + " is a Prime Number.");
        } else {
            System.out.println("OUTPUT: " + numberToCheck + " is NOT a Prime Number.");
        }
        System.out.println("--------------------------------");
    }
}