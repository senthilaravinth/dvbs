pipeline {
    agent any
    stages {
        stage('Docker Build & Push') {
            steps {
                // The '.' tells Docker to look for the Dockerfile and pom.xml here
                bat "docker build -t your-docker-id/prime-app:latest ."
                bat "docker push your-docker-id/prime-app:latest"
            }
        }
        stage('Kubernetes Deploy') {
            steps {
                bat "kubectl delete job prime-checker-job --ignore-not-found"
                bat "kubectl apply -f deployment.yaml"
            }
        }
        stage('Verify Output') {
            steps {
                sleep 15
                bat "kubectl logs job/prime-checker-job"
            }
        }
    }
}