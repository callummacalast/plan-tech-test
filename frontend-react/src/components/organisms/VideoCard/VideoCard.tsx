import { VideoCardProps } from './types'
import { Card } from '../../molecules/Card'
import { PreviewMode } from '../../../constants/enums'

const VideoCard = ({ video }: VideoCardProps) => {
  const handleVideoSeek = (): void => {
    console.warn('You are seeking')
  }
  const handleVideoStart = (): void => {
    console.warn('Video has started')
  }
  const handleVideoEnd = (): void => {
    console.warn('Video has ended')
  }
  const handleVideoResume = (): void => {
    console.warn('Video has resumed')
  }

  return (
    <Card
      key={video.id}
      data={video}
      previewMode={PreviewMode.INTERACTIVE}
      onVideoSeek={handleVideoSeek}
      onVideoStart={handleVideoStart}
      onVideoEnd={handleVideoEnd}
      onVideoResume={handleVideoResume}
    />
  )
}

export default VideoCard
