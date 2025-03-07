import { VideoListTemplate } from '../../components/templates/VideoListTemplate'
import { useVideos } from '../../hooks/useVideos'

const BrowseVideoPage = () => {
  const { videos } = useVideos()

  return <VideoListTemplate videos={videos || null} />
}

export default BrowseVideoPage
