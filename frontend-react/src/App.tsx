import './App.css'
import DataError from './components/DataError'
import { BrowseVideoPage } from './pages/BrowseVideosPage'
import { VideoProvider } from './providers/VideoProvider'

function App() {
  return (
    <VideoProvider>
      <DataError />
      <BrowseVideoPage />
    </VideoProvider>
  )
}

export default App
