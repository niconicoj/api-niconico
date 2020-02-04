pipeline {
  agent {
    dockerfile {
      filename 'Dockerfile'
    }

  }
  stages {
    stage('Build') {
      steps {
        sh '''composer i --no-progress
php artisan key:generate
php artisan config:cache'''
      }
    }

  }
}