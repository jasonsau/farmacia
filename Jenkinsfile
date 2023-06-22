pipeline {
    agent { docker { image 'php:8.1.11-alpine'} }
    stages {
        stage ('build') {
            step {
                sh 'php --version'
            }
        }
    }
}