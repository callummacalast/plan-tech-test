import './App.css'
import { BrowseVideoPage } from './pages/BrowseVideosPage'
import { VideoProvider } from './providers/VideoProvider'

function App() {
  return (
    <VideoProvider>
      <BrowseVideoPage />
    </VideoProvider>
  )
}

export default App
