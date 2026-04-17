pipeline {
    agent any

    stages {
        stage('Docker Build & Push') {
            steps {
                // Building the image using the root Dockerfile
                bat "docker build -t your-username/prime-app:latest ."
                bat "docker push your-username/prime-app:latest"
            }
        }

        stage('Kubernetes Deploy') {
            steps {
                echo "Deploying to Kubernetes using deployment.yaml..."
                bat "kubectl delete job prime-checker-job --ignore-not-found"
                bat "kubectl apply -f deployment.yaml"
            }
        }

        stage('Verify Output') {
            steps {
                echo "Fetching application logs..."
                sleep 10 // Give the pod a moment to finish
                bat "kubectl logs job/prime-checker-job"
            }
        }
    }
}